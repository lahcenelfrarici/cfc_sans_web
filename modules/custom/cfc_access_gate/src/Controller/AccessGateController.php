<?php

declare(strict_types=1);

namespace Drupal\cfc_access_gate\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Verifies the maps/reports access code server-side (CFC-05 pentest fix).
 *
 * The code itself lives in State (set via drush), never in the JS bundle,
 * so it can no longer be read from page source by an anonymous visitor.
 */
class AccessGateController extends ControllerBase {

  public function __construct(
    protected StateInterface $state,
  ) {}

  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('state'),
    );
  }

  public function verify(Request $request): JsonResponse {
    $payload = json_decode($request->getContent(), TRUE);
    $submitted = is_array($payload) ? ($payload['code'] ?? '') : $request->request->get('code', '');
    $submitted = is_string($submitted) ? trim($submitted) : '';

    $expected = (string) $this->state->get('cfc_access_gate.maps_code', '');

    $valid = $submitted !== '' && $expected !== '' && hash_equals($expected, $submitted);

    return new JsonResponse(['valid' => $valid]);
  }

}
